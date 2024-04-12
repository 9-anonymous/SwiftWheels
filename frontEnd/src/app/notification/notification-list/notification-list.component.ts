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
 currentPage = 1;
 totalPages = 0;
 pageSize = 7;

 constructor(private router: Router, private notificationService: NotificationService) {}

 ngOnInit(): void {
    this.loadNotifications();
 }

 loadNotifications(): void {
    this.notificationService.getNotifications().subscribe(response => {
      this.notifications = (response as any).notifications;
      this.totalPages = Math.ceil(this.notifications.length / this.pageSize);
      this.paginateNotifications();
    }, error => {
      console.error('Error loading notifications:', error);
    });
 }

 paginateNotifications() {
    const startIndex = (this.currentPage - 1) * this.pageSize;
    const endIndex = startIndex + this.pageSize;
    this.notifications = [...this.notifications.slice(startIndex, endIndex)];
 }

 nextPage() {
    if (this.currentPage < this.totalPages) {
      this.currentPage++;
      this.paginateNotifications();
    }
 }

 prevPage() {
    if (this.currentPage > 1) {
      this.currentPage--;
      this.paginateNotifications();
    }
 }

 navigateToMessage(notification: any): void {
    this.router.navigate(['/contact-message', notification.messageId]);
 }

 getPhotoUrl(notification: any): string {
    const baseUrl = 'http://localhost:8000/uploads/';
    return notification && notification.sender_picture ? baseUrl + notification.sender_picture : '';
 }
}
