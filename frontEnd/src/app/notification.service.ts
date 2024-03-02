import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
 import { catchError,map, tap } from 'rxjs/operators';
import { Observable, throwError } from 'rxjs';

@Injectable({
 providedIn: 'root'
})
export class NotificationService {
 private apiUrl = 'http://localhost:8000/notifications';

 constructor(private http: HttpClient) {}

 getUnreadNotifications(): Observable<any[]> {
  const headers = new HttpHeaders().set('Authorization', 'Bearer ' + localStorage.getItem('token'));
  return this.http.get<any[]>(`${this.apiUrl}/unread`, { headers }).pipe(
    tap(data => console.log('Unread notifications data:', data)),
    catchError(error => {
      console.error('Error fetching unread notifications:', error);
      return throwError(error);
    })
  );
}

 getUnreadNotificationsCount(): Observable<number> {
   const headers = new HttpHeaders().set('Authorization', 'Bearer ' + localStorage.getItem('token'));
   return this.http.get<number>(`${this.apiUrl}/unread/count`, { headers });
  }
 markNotificationsAsRead(): Observable<any> {
   const headers = new HttpHeaders().set('Authorization', 'Bearer ' + localStorage.getItem('token'));
   return this.http.post(`${this.apiUrl}/mark-as-read`, {}, { headers });
 }
}

