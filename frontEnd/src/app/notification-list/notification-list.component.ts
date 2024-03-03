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
  lastFetchedCount: number = 0; // Keep track of the last fetched count

  constructor(private router: Router, private notificationService: NotificationService, private cdr: ChangeDetectorRef) {}

  ngOnInit(): void {
    this.loadNotifications();
    this.loadUnreadCount(); // Load the unread count on component initialization

   }
   loadUnreadCount(): void {
    this.notificationService.getUnreadNotificationsCount().subscribe(response => {
      this.notificationCount = response.unreadCount;
      this.cdr.detectChanges(); // Ensure the view updates
    }, error => {
      console.error('Error loading unread notifications count:', error);
    });
 }

  
   loadNotifications(): void {
    this.notificationService.getNotifications().subscribe(response => {
        // Fetch the latest 10 notifications
        this.notifications = (response as any).notifications.slice(0, 10);
        this.lastFetchedCount = this.notifications.length; // Update the last fetched count
      },
    error => {
        console.error('Error loading notifications:', error);
    });
}

markAsRead(): void {
  this.notificationService.markNotificationAsRead(this.notifications[0].id).subscribe(
    response => {
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
      this.loadNotifications(); // Reload notifications when the bell is clicked
      this.notificationCount = 0; // Reset the counter when opening the bell
    }
 }
}

    
