// notification-list.component.ts
import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { NotificationService } from '../../notification.service';

@Component({
 selector: 'app-notification-list',
 templateUrl: './notification-list.component.html',
 styleUrls: ['./notification-list.component.css']
})
export class NotificationListComponent implements OnInit {
 notifications: any[] = [];

 constructor(private router: Router, private notificationService: NotificationService) {}

 ngOnInit(): void {
    this.loadNotifications();
 }

 loadNotifications(): void {
    this.notificationService.getNotifications().subscribe(response => {
      this.notifications = (response as any).notifications;
    }, error => {
      console.error('Error loading notifications:', error);
    });
 }

 navigateToMessage(notification: any): void {
    this.router.navigate(['/contact-message', notification.messageId]);
 }
}
