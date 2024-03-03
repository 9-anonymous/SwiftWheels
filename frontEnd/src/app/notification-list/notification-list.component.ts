import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { NotificationService } from '../notification.service';
import { ChangeDetectorRef } from '@angular/core';

@Component({
  selector: 'app-notification-list',
  templateUrl: './notification-list.component.html',
  styleUrls: ['./notification-list.component.css']
})
export class NotificationListComponent implements OnInit {

  notifications: any[] = [];
  notificationCount: number = 0;
  showNotifications: boolean = false;

  constructor(private router: Router, private notificationService: NotificationService, private cdr: ChangeDetectorRef) {}

  ngOnInit(): void {
    this.loadNotifications();
   }
  
  
   loadNotifications(): void {
    this.notificationService.getNotifications().subscribe(response => {
        // Fetch the latest 10 notifications
        this.notifications = (response as any).notifications.slice(0, 10).reverse();
        this.notificationCount += this.notifications.length; // Add to the counter
    },
    error => {
        console.error('Error loading notifications:', error);
    });
}

markAsRead(): void {
  this.notificationService.markNotificationAsRead(this.notifications[0].id).subscribe(
      response => {
          // Reset the counter after clicking on the bell
          this.notificationCount = 0;
          this.showNotifications = false;
      },
      error => {
          console.error('Error marking notification as read:', error);
      }
  );
}


  navigateToMessage(notification: any): void {
    this.router.navigate(['/contact-message', notification.messageId]);
   
    // Ensure the notification id is correctly passed
    this.notificationService.markNotificationAsRead(notification.id).subscribe(
       response => {
           // Optionally, update the notification status in the UI
           notification.isRead = true;
       },
       error => {
           console.error('Error marking notification as read:', error);
       }
    );
   }
   

   toggleNotifications(): void {
    this.showNotifications = !this.showNotifications;
    if (this.showNotifications) {
       this.notificationCount = 0; // Reset the counter when opening the bell
    }
   }
    }
