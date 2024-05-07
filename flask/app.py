from flask import Flask, render_template
import mysql.connector

app = Flask(__name__)




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
    # Fetch data from history_search and car tables
    history_data = get_history_data()
    car_data = get_car_data()
    
    # Initialize dictionary to store recommended cars for each user
    recommended_cars = {}
    
    # Iterate over each unique user_id in history_search
    unique_user_ids = set(entry['user_id'] for entry in history_data)
    for user_id in unique_user_ids:
        user_history = [entry for entry in history_data if entry['user_id'] == user_id]
        user_preferences = set(car['mark'] for entry in user_history for car in car_data)
        
        # Initialize a dictionary to store scores for each car
        car_scores = {car['mark']: 0 for car in car_data}
        
        # Calculate scores for each car based on user preferences
        for preference in user_preferences:
            for entry in user_history:
                for car in car_data:
                    if car['mark'] in entry['mark'] and car['mark'] == preference:
                        car_scores[car['mark']] += 1
        
        # Sort cars based on scores and recommend the top ones
        sorted_cars = sorted(car_scores.items(), key=lambda x: x[1], reverse=True)[:5]
        recommended_cars[user_id] = [car_id for car_id, _ in sorted_cars]
    
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
    
    # Create HTML to display recommended cars
    html = '<h1>Recommended Cars</h1>'
    for user_id, cars in recommended_cars.items():
        html += f'<h2>User {user_id}</h2>'
        html += '<ul>'
        for mark in cars:
            html += f'<li>{mark}</li>'
        html += '</ul>'
    
    return html














if __name__ == '__main__':
    app.run(debug=True)
