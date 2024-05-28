import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { AuthService } from '../auth.service';

declare var bootstrap: any;  // Add this line to declare bootstrap for TypeScript

@Component({
  selector: 'app-subscription-modal',
  templateUrl: './subscription-modal.component.html',
  styleUrls: ['./subscription-modal.component.css']
})
export class SubscriptionModalComponent implements OnInit {
  subscription = { duration: '', price: 0 };

  constructor(
    private http: HttpClient,
    private authService: AuthService
  ) {}

  ngOnInit() {
    this.updatePrice();
  }

  updatePrice() {
    switch (this.subscription.duration) {
      case '1 month':
        this.subscription.price = 10;
        break;
      case '6 months':
        this.subscription.price = 50;
        break;
      case '1 year':
        this.subscription.price = 90;
        break;
      default:
        this.subscription.price = 0;
    }
  }

  subscribe() {
    const userId = this.authService.getUserId();
    if (!userId) {
      console.error('User ID not found. Please login again.');
      return;
    }
  
    this.http.post('http://localhost:8000/subscribe', {
      userId,
      duration: this.subscription.duration,
      price: this.subscription.price
    })
    .subscribe(
      (response: any) => {
        console.log('Subscription successful', response);
        this.authService.setSubscribed(true);
        const modalElement = document.getElementById('subscribeModal');
        const modal = bootstrap.Modal.getInstance(modalElement);
        modal.hide();
      },
      error => {
        console.error('Subscription failed', error);
      }
    );
  }
  
}
