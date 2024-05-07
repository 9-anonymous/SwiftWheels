from flask import Flask, render_template, jsonify
import mysql.connector
from flask_cors import CORS
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import cosine_similarity

app = Flask(__name__)
CORS(app)




# Function to establish connection to MySQL database
def get_db_connection():
    return mysql.connector.connect(
        host='LOCALHOST',
        user='root',
        password='',
        database='sw'
    )


# Function to fetch data from history search table
def get_history_data():
    conn = get_db_connection()
    cursor = conn.cursor(dictionary=True)
    cursor.execute('SELECT * FROM history_search')
    data = cursor.fetchall()
    cursor.close()
    conn.close()
    return data

@app.route('/Rec')
def history():
    history_data = get_history_data()
    
    # Create an HTML string to display the history data as a list
    html = '<h1>History Search Data</h1>'
    html += '<ul>'
    for row in history_data:
        html += '<li>'
        html += f'User ID: {row["user_id"]}, Price Range Min: {row["price_range_min"]}'
        html += '</li>'
    html += '</ul>'
    
    return html

from sklearn.metrics.pairwise import cosine_similarity

# Function to recommend cars for each user based on their history_search data
def recommend_cars():
    history_data = get_history_data()
    car_data = get_car_data()
    recommended_cars = {}

    # Prepare data for cosine similarity
    user_search_histories = []
    for user_id in set(entry['user_id'] for entry in history_data):
        user_history = [entry for entry in history_data if entry['user_id'] == user_id]
        # Combine user's search history into a single string
        user_search_histories.append(' '.join([f"{entry['mark']} {entry['model']} {entry['price_range_min']} {entry['price_range_max']}" for entry in user_history]))
    
    car_attributes = [' '.join([car['mark'], car['model'], str(car['price'])]) for car in car_data]
    
    # Compute cosine similarity
    vectorizer = TfidfVectorizer().fit(user_search_histories + car_attributes)
    vectors = vectorizer.transform(user_search_histories + car_attributes)
    cosine_sim = cosine_similarity(vectors[:len(user_search_histories)], vectors[len(user_search_histories):])
    
    # Recommend cars based on cosine similarity
    for i, user_id in enumerate(set(entry['user_id'] for entry in history_data)):
        similar_indices = cosine_sim[i].argsort()[:-6:-1]
        recommended_cars[user_id] = [car_data[idx]['mark'] for idx in similar_indices]
    
    return recommended_cars




# Function to create user-car matrix
def create_user_car_matrix(history_data, car_data):
    user_car_matrix = [[0] * len(car_data) for _ in range(len(history_data))]
    car_id_to_index = {car['mark']: index for index, car in enumerate(car_data)}
    
    for i, history_entry in enumerate(history_data):
        for mark in history_entry['mark']:
            if mark in car_id_to_index:
                user_car_matrix[i][car_id_to_index[mark]] = 1
    
    return user_car_matrix


# Function to fetch data from car table
def get_car_data():
    conn = get_db_connection()
    cursor = conn.cursor(dictionary=True)
    cursor.execute('SELECT * FROM car')  # Ensure this matches your table structure
    data = cursor.fetchall()
    cursor.close()
    conn.close()
    return data


# Route to display recommended cars
@app.route('/recommend_cars')
def display_recommended_cars():
    recommended_cars = recommend_cars()
    return jsonify(recommended_cars)















if __name__ == '__main__':
    app.run(debug=True)
