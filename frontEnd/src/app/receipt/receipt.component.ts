import { Component, OnInit } from '@angular/core';
import { SharedService } from '../shared.service';
import { AuthService } from '../auth.service';

@Component({
  selector: 'app-receipt',
  templateUrl: './receipt.component.html',
  styleUrls: ['./receipt.component.css']
})
export class ReceiptComponent implements OnInit {
  purchasedItems: any[] = [];

  constructor(private sharedService: SharedService, private authService: AuthService) {}

  ngOnInit(): void {
    const userId = this.authService.getUserId();
    if (userId) {
      this.sharedService.getPurchasedItems(userId).subscribe(items => {
        this.purchasedItems = items;
        console.log("purchased items data: ", this.purchasedItems);
      });
    } else {
      console.error('User ID not available');
    }
  }
}