import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class RecommendationService {
  private apiUrl = 'http://localhost:5000/recommend_cars'; // Replace with your Flask backend URL

  constructor(private http: HttpClient) { }

  getRecommendedCars(): Observable<any> {
    return this.http.get(this.apiUrl);
  }
}