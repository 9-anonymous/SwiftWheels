import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable, throwError } from 'rxjs';
import { catchError, map } from 'rxjs/operators';
import { tap } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
export class SearchService {

  constructor(private http: HttpClient) { }

  getMarks(): Observable<string[]> {
    return this.http.get<any[]>('http://localhost:8000/marks').pipe(
       map(response => response.map(item => item.mark)), // Adjust this line if the property name is different
       catchError(this.handleError)
    );
   }
   getAllCars(): Observable<any[]> {
    return this.http.get<any[]>('http://localhost:8000/cars');
   }
   

  getModelsForMark(mark: string): Observable<string[]> {
    return this.http.get<any[]>(`http://localhost:8000/models/${mark}`).pipe(
      map(response => response.map(item => item.model)), // Extract the 'Model' property from each object
      catchError(this.handleError) // Error handling for HTTP request
    );
  }


  searchCars(searchCriteria: any): Observable<any> {
   const url = 'http://localhost:8000/search/cars';
   return this.http.post<any>(url, searchCriteria).pipe(
      tap(data => console.log('Data from searchCars:', data)), // Log the data received
      catchError(this.handleError)
   );
  }
  
  
  private handleError(error: any) {
    console.error('An error occurred:', error); // For demo purposes only
    return throwError('Something went wrong; please try again later.'); // Throw an observable error
  }


  getCarOwner(carId: number): Observable<any> {
    return this.http.get(`http://localhost:8000/car/${carId}/owner`);
 }
  
}
