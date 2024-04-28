// shared.service.ts

import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { SearchService } from 'src/search.service';
import { Observable } from 'rxjs/internal/Observable';
import { AuthService } from './auth.service';
@Injectable({
 providedIn: 'root',
})
export class SharedService {
   private apiUrl = 'http://localhost:8000';

 private userTypeSource = new BehaviorSubject<string>('');
 currentUserType = this.userTypeSource.asObservable();

 constructor(private http: HttpClient, private SearchService : SearchService,private authService: AuthService) { }

 addToCart(car: any) {
   // Assuming you have a method in your DatabaseService to save the car
   this.SearchService.saveCar(car).subscribe(response => {
     console.log('Car saved successfully', response);
   }, error => {
     console.error('Error saving car', error);
   });
}
getCartItems(userId: string): Observable<any[]> {
  // Use the userId to fetch cart items for that user
  return this.http.get<any[]>(`${this.apiUrl}/cart/items/${userId}`);
}

 changeUserType(userType: string) {
    this.userTypeSource.next(userType);
 }
 handlePayment(itemId: number, paymentAmount: number): Observable<any> {
  return this.http.post(`${this.apiUrl}/cart/payment`, { itemId, paymentAmount });
}
 
 deleteCartItem(itemId: number): Observable<any> {
  return this.http.delete(`${this.apiUrl}/cart/delete/${itemId}`);
 }
 updateUserBankAmount(userId: string, amount: number): Observable<any> {
  return this.http.post(`${this.apiUrl}/user/update-bank-amount`, { userId, amount });
 }
}
