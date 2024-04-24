import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { NotificationService } from '../../notification.service';
import { ChangeDetectorRef } from '@angular/core';

@Component({
  selector: 'app-notification-bell',
  templateUrl: './notification-bell.component.html',
  styleUrls: ['./notification-bell.component.css']
})
export class NotificationBellComponent implements OnInit {

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

 calculateTimeSince(timestamp: string): string {
  const currentTime = new Date();
  const createdAt = new Date(timestamp);
  const differenceInSeconds = Math.floor((currentTime.getTime() - createdAt.getTime()) / 1000);

  if (differenceInSeconds < 60) {
    return `${differenceInSeconds} seconds ago`;
  } else if (differenceInSeconds < 3600) {
    return `${Math.floor(differenceInSeconds / 60)} minutes ago`;
  } else if (differenceInSeconds < 86400) {
    return `${Math.floor(differenceInSeconds / 3600)} hours ago`;
  } else if (differenceInSeconds < 604800) {
    return `${Math.floor(differenceInSeconds / 86400)} days ago`;
  } else if (differenceInSeconds < 2419200) {
    return `${Math.floor(differenceInSeconds / 604800)} weeks ago`;
  } else if (differenceInSeconds < 29030400) {
    return `${Math.floor(differenceInSeconds / 2419200)} months ago`;
  } else {
    return `${Math.floor(differenceInSeconds / 29030400)} years ago`;
  }
}

   loadNotifications(): void {
    this.notificationService.getNotifications().subscribe(response => {
        // Fetch the latest 10 notifications
        this.notifications = (response as any).notifications.slice(0, 6);
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
  console.log('Notification:', notification); // Debugging line
  console.log('Message ID:', notification.messageId); // Debugging line

  // Check if notification and messageId are not null or undefined
  if (notification && notification.messageId) {
     this.router.navigate(['/contact-message', notification.messageId]);
 
     // Ensure the notification id is correctly passed
     if (notification.id) {
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
  } else {
     console.error('Notification or messageId is null or undefined');
  }
 }
 
   

   toggleNotifications(): void {
    this.showNotifications = !this.showNotifications;
    if (this.showNotifications) {
      this.loadNotifications(); // Reload notifications when the bell is clicked
      this.notificationCount = 0; // Reset the counter when opening the bell
    }
 }


 markAllAsRead(): void {
  this.notificationService.markAllNotificationsAsRead().subscribe(
     response => {
       this.notifications.forEach(notification => notification.isRead = true);
       this.notificationCount = 0;
       this.cdr.detectChanges(); // Ensure the view updates
     },
     error => {
       console.error('Error marking all notifications as read:', error);
     }
  );
 }
 navigateToNotificationsList(): void {
  this.router.navigate(['/notifications']);
 }
 
 getPhotoUrl(notification: any): string {
  const baseUrl = 'http://localhost:8000/uploads/';
   
  return notification && notification.sender_picture ? baseUrl + notification.sender_picture : '';
 }
 
}

    
