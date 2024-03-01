import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { NotificationService } from '../notification.service';

@Component({
  selector: 'app-notification-list',
  templateUrl: './notification-list.component.html',
  styleUrls: ['./notification-list.component.css']
})
export class NotificationListComponent implements OnInit {

  notifications: any[] = [];
  notificationCount: number = 0;
  showNotifications: boolean = false;

  constructor(private router: Router, private notificationService: NotificationService) {}

  ngOnInit(): void {
    this.loadNotifications();
  }

  loadNotifications(): void {
    this.notificationService.getUnreadNotifications().subscribe(
      notifications => {
        this.notifications = notifications;
        this.notificationCount = this.notifications.length;
      },
      error => {
        console.error('Error loading notifications:', error);
      }
    );
  }

  markAsRead(): void {
    this.notificationService.markNotificationsAsRead().subscribe(
      response => {
        this.notificationCount = 0;
        this.showNotifications = false;
      },
      error => {
        console.error('Error marking notifications as read:', error);
      }
    );
  }

  navigateToMessage(messageUrl: string): void {
    // Navigate to the message URL or perform any other action
    this.router.navigate([messageUrl]);
  }

  toggleNotifications(): void {
    this.showNotifications = !this.showNotifications;
    if (this.showNotifications) {
      this.markAsRead();
    }
  }
}
