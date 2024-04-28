
import { Component, OnInit } from '@angular/core';
import { SharedService } from '../shared.service';

@Component({
 selector: 'app-panier',
 templateUrl: './panier.component.html',
 styleUrls: ['./panier.component.css']
})
export class PanierComponent implements OnInit {
  cartItems: any[] = [];
  cars: any[] = [
     // Example car objects
     {
       imageUrl: 'path/to/image1.jpg',
       description: 'Car 1 description',
       owner: 'Owner 1',
       model: 'Model 1',
       price: 1000
     },
     // Add more cars as needed
  ];
  payment = {
    nameOnCard: '',
    cardNumber: '',
    cardDate: '',
    cardCVV: '',
    totalAmount: 3020.00
   };
   
  constructor(private sharedService: SharedService) {}
 
  ngOnInit() {
     this.sharedService.getCart().subscribe(cart => {
       this.cartItems = cart;
     });
  }
 
  addedCar(car: any) {
     this.sharedService.addToCart(car);
     console.log(car);
  }
 }
 