import { Component, OnInit } from '@angular/core';
import { SharedService } from '../shared.service';
import { AuthService } from '../auth.service'; 

@Component({
  selector: 'app-panier',
  templateUrl: './panier.component.html',
  styleUrls: ['./panier.component.css']
})
export class PanierComponent implements OnInit {
  cartItems: any[] = [];
  selectedCartItem: any; // Add a property to store the selected cart item

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

  handlePayment(item: any) {
    const { price } = item;
    this.payment.totalAmount = price; // Update the totalAmount with the price of the selected car
    this.selectedCartItem = item; // Store the selected cart item
}


confirmCheckout() {
  if (this.selectedCartItem) {
    const { id, price } = this.selectedCartItem;
    this.sharedService.handlePayment(id, price).subscribe(response => {
      console.log('Payment successful', response);
      // Remove the purchased item from the cart
      this.cartItems = this.cartItems.filter(item => item.id !== id);

      // Create a new receipt
      const purchaseDate = new Date();
      const receipt = {
        cart: this.selectedCartItem,
        purchaseDate: purchaseDate.toISOString(),
      };
      this.sharedService.createReceipt(receipt).subscribe(
        response => {
          console.log('Receipt created', response);
          // Optionally, you can refresh the purchased items here if needed
        },
        error => {
          console.error('Error creating receipt', error);
        }
      );
    }, error => {
      console.error('Payment error', error);
    });
  }
}


  
  deleteCartItem(itemId: number) {
    this.sharedService.deleteCartItem(itemId).subscribe(response => {
      console.log('Cart item deleted', response);
      // Remove the item from the cartItems array
      this.cartItems = this.cartItems.filter(item => item.id !== itemId);
    }, error => {
      console.error('Deletion error', error);
    });
  }
 

}
