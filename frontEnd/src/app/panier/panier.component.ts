import { Component, OnInit } from '@angular/core';
import { SharedService } from '../shared.service';
import { AuthService } from '../auth.service'; // Adjust the path as necessary

@Component({
 selector: 'app-panier',
 templateUrl: './panier.component.html',
 styleUrls: ['./panier.component.css']
})
export class PanierComponent implements OnInit {
 cartItems: any[] = [];
  
 payment = {
    nameOnCard: '',
    cardNumber: '',
    cardDate: '',
    cardCVV: '',
    totalAmount: 3020.00
 };
   
 constructor(private sharedService: SharedService, private authService: AuthService) {}
 
 ngOnInit(): void {
    const userId = this.authService.getUserId();
    if (userId) {
      this.sharedService.getCartItems(userId).subscribe(items => {
        this.cartItems = items;
        console.log("items data: ", this.cartItems);
      });
    } else {
      console.error('User ID not available');
    }
 }

 addedCar(car: any) {
    this.sharedService.addToCart(car);
    console.log(car);
 }
}
