import { Component,OnInit } from '@angular/core';
import { MessageService } from '../../message.service';
import { NgModule } from '@angular/core';
import { AuthService } from '../../auth.service';
import { Router } from '@angular/router';

// Apply @Component decorator to the ContactListComponent class
@Component({
  selector: 'app-contact-list',
  templateUrl: './contact-list.component.html',
  styleUrls: ['./contact-list.component.css']
})
export class ContactListComponent implements OnInit {
  allMessages: any[] = []; 
  messages: any[] = [];
  currentPage = 1;
  totalPages = 0;
  pageSize = 7;
  constructor(private messageService: MessageService, private authService: AuthService,private router: Router) { }

  ngOnInit(): void {
    const receiverUsername = this.authService.getUsername();
    this.messageService.getMessagesForUser(receiverUsername).subscribe(response => {
      this.allMessages = (response as any).messages;
      this.allMessages.reverse();
      this.totalPages = Math.ceil(this.allMessages.length / this.pageSize);
      this.paginateMessages();
    });
 }
 paginateMessages() {
  const startIndex = (this.currentPage - 1) * this.pageSize;
  const endIndex = startIndex + this.pageSize;
  this.messages = [...this.allMessages.slice(startIndex, endIndex)];
}
  viewMessage(messageId: number): void {
  this.router.navigate(['/contact-message', messageId]);
}
getPhotoUrl(notification: any): string {
  const baseUrl = 'http://localhost:8000/uploads/';
   
  return notification && notification.sender_picture ? baseUrl + notification.sender_picture : '';
 }
 nextPage() {
  if (this.currentPage < this.totalPages) {
    this.currentPage++;
    this.paginateMessages();
  }
}

prevPage() {
  if (this.currentPage > 1) {
    this.currentPage--;
    this.paginateMessages();
  }
}
}
