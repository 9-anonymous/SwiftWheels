// src/app/login.service.ts
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable, throwError } from 'rxjs';
import { catchError,map, tap } from 'rxjs/operators';
import { BehaviorSubject } from 'rxjs';
interface LoginResponse {
  userId: string;
  token: string;
  roles:String[];

  // other properties if applicable
}
 @Injectable({
  providedIn: 'root',
})
export class LoginService {
  private apiUrl = 'http://localhost:8000'; // Update with your Symfony API URL
  private errorSubject = new BehaviorSubject<string>('');

  constructor(private http: HttpClient) {}

  login(user: any): Observable<any> {
    return this.http.post(`${this.apiUrl}/login`, user, { observe: 'response' }).pipe(
      tap(response => {
        const token = (response.body as LoginResponse)?.token;
        if (token) {
          localStorage.setItem('token', token);
        } else {
          console.error('Token not found in response body');
        }
        localStorage.setItem('isAuthenticated', 'true');
        localStorage.setItem('username', user.username);
        console.log('username:', user.username);
        const userId = (response.body as LoginResponse)?.userId;
        localStorage.setItem('userId', userId);
        const roles = (response.body as LoginResponse)?.roles;
        localStorage.setItem('roles', JSON.stringify(roles));
        // Log the user ID to the console
        console.log('User ID:', userId);
        console.log('User Roles:', roles);
      }),
      catchError((error) => {
        // Set the error message based on the server response
        this.errorSubject.next(error.error?.message || 'An unknown error occurred');
        return throwError(error);
      })
    );
  }
  getError(): Observable<string> {
    return this.errorSubject.asObservable();
  }
}
