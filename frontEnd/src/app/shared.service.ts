// shared.service.ts

import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';
import { Observable } from 'rxjs';
@Injectable({
 providedIn: 'root',
})
export class SharedService {

private cart = new BehaviorSubject<any[]>([]);
currentCart = this.cart.asObservable();
  
 private userTypeSource = new BehaviorSubject<string>('');
 currentUserType = this.userTypeSource.asObservable();

 constructor() {}



 addToCart(car: any) {
   this.cart.next([...this.cart.value, car]);
}

getCart() {
   return this.cart.asObservable();
}

 changeUserType(userType: string) {
    this.userTypeSource.next(userType);
 }
}
