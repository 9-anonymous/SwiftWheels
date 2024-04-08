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
messages: any[] = [];

  constructor(private messageService: MessageService, private authService: AuthService,private router: Router) { }

  ngOnInit(): void {
    const receiverUsername = this.authService.getUsername();
    this.messageService.getMessagesForUser(receiverUsername).subscribe(response => {
       this.messages = (response as any).messages; // Use type assertion
       // Log the entire messages array to inspect its structure
       console.log(this.messages);
       // Optionally, log each message's createdAt property
       this.messages.forEach(message => {
         console.log(message.createdAt);
       });
    });
   }
  viewMessage(messageId: number): void {
  this.router.navigate(['/contact-message', messageId]);
}
getPhotoUrl(notification: any): string {
  const baseUrl = 'http://localhost:8000/uploads/';
   
  return notification && notification.sender_picture ? baseUrl + notification.sender_picture : '';
 }
}
