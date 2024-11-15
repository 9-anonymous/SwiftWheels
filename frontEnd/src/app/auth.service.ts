// auth.service.ts
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable, throwError } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class AuthService {
  private isAuthenticatedValue = false;
  private usernameValue = '';
  private userIdValue: string = ''; // declare userIdValue property
  private subscribed: boolean = false; 

  constructor(private http: HttpClient) {
    const token = localStorage.getItem('token');
    const isAuthenticated = localStorage.getItem('isAuthenticated');
    const username = localStorage.getItem('username');
    const userId = localStorage.getItem('userId');
    if (userId) {
      this.userIdValue = userId;
    }
    this.isAuthenticatedValue = isAuthenticated === 'true';
    this.usernameValue = username || '';
  }
  isAuthenticated(): boolean {
    return this.isAuthenticatedValue;
  }

  getUsername(): string {
    return this.usernameValue;
  }
  getUserId(): string | null {
    return this.userIdValue;
  }
  login(username: string, password: string): void {
    // Implement login logic, set isAuthenticated and username
    this.isAuthenticatedValue = true;
    this.usernameValue = username;

    // Additionally, you may want to store the username in localStorage
    localStorage.setItem('username', this.usernameValue);
}
  getToken(): string | null {
    return localStorage.getItem('token');
  }
  logout(): void {
    localStorage.removeItem('token');
    localStorage.removeItem('isAuthenticated');
    localStorage.removeItem('username');
    this.isAuthenticatedValue = false;
    this.usernameValue = '';
  }
  hasRole(role: string): boolean {
    const roles = this.getRoles();
    return roles.includes(role);
  }
  
  getRoles(): string[] {
    const rolesString = localStorage.getItem('roles');
    return rolesString ? JSON.parse(rolesString) : [];
  }
  getUsersByRole(role: string): Observable<string[]> {
    return this.http.get<string[]>(`http://localhost:8000/users/role/${role}`);
   }
   
   getUserById(id: string): Observable<any> {
    return this.http.get<any>(`http://localhost:8000/users/${id}`);
  }
  isUserSubscribed(): boolean {
    return this.subscribed;
  }

  // Method to set subscription status
  setSubscribed(status: boolean): void {
    this.subscribed = status;
  }
  checkSubscriptionStatus(): void {
    this.getUserById(this.userIdValue).subscribe(user => {
      this.subscribed = user.isSubscribed;
    });
  }
  isExpert(): boolean {
    return this.getRoles().includes('ROLE_EXPERT');
  }
  
}
