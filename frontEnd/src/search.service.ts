import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable, throwError } from 'rxjs';
import { catchError, map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class SearchService {

  constructor(private http: HttpClient) { }

  getMarks(): Observable<string[]> {
    // Adjust the endpoint URL to match your Symfony backend API
    return this.http.get<any[]>('http://localhost:8000/marks').pipe(
      map(response => response.map(item => item.Mark)),
      catchError(this.handleError) // Error handling for HTTP request
    );
  }

  getModelsForMark(mark: string): Observable<string[]> {
    return this.http.get<any[]>(`http://localhost:8000/models/${mark}`).pipe(
      map(response => response.map(item => item.Model)), // Extract the 'Model' property from each object
      catchError(this.handleError) // Error handling for HTTP request
    );
  }

  searchCars(searchCriteria: any): Observable<any> {
    // Adjust the endpoint URL and request body to match your Symfony backend API
    const url = 'http://localhost:8000/search/cars'; // Adjust the URL accordingly
    return this.http.post<any>(url, searchCriteria).pipe(
      catchError(this.handleError) // Error handling for HTTP request
    );
  }
  
  
  private handleError(error: any) {
    console.error('An error occurred:', error); // For demo purposes only
    return throwError('Something went wrong; please try again later.'); // Throw an observable error
  }
}
