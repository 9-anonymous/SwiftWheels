import { Component, OnInit } from '@angular/core';
import { AuthService } from '../../auth.service';
import { MessageService } from '../../message.service';
import { Router, ActivatedRoute } from '@angular/router';
import { SharedService } from '../../shared.service';

@Component({
 selector: 'app-contact-input',
 templateUrl: './contact-input.component.html',
 styleUrls: ['./contact-input.component.css']
})
export class ContactInputComponent implements OnInit {
 title: string = '';
 content: string = ''; 
 selectedFile: File | null = null;
 receiver: string = '';
 usernames: string[] = [];

 constructor(private authService: AuthService, private sharedService: SharedService, private messageService: MessageService, private router: Router, private route: ActivatedRoute) {}

 ngOnInit(): void {
  // Check if the component was navigated to with a specific receiver
  this.route.queryParams.subscribe(params => {
     if (params['receiver']) {
       // Load all usernames and set the receiver
       this.loadUsernames().then(() => {
         this.receiver = params['receiver'];
       });
     } else {
       // Role-based selection from the navbar
       this.sharedService.currentUserType.subscribe(role => {
         if (role) {
           this.loadUsernames(role);
         }
       });
     }
  });
 }
 loadUsernames(role?: string): Promise<void> {
  return new Promise<void>((resolve, reject) => {
     if (role === undefined) {
       this.messageService.getUsernames().subscribe(usernames => {
         this.usernames = usernames;
         resolve();
       }, error => {
         reject(error);
       });
     } else {
       this.messageService.getUsernamesByRole(role).subscribe(usernames => {
         const loggedInUsername = this.authService.getUsername();
         this.usernames = usernames.filter(username => username !== loggedInUsername);
         resolve();
       }, error => {
         reject(error);
       });
     }
  });
 }
 

 onFileChange(event: Event): void {
    const inputElement = event.target as HTMLInputElement;
    if (inputElement && inputElement.files) {
      const file = inputElement.files[0];
      if (file) {
        this.selectedFile = file;
      }
    }
 }

 sendMessage(): void {
    const formData = new FormData();
    formData.set('title', this.title);
    formData.set('content', this.content);
    formData.set('receiver', this.receiver);
    if (this.selectedFile) {
      formData.set('photoUrl', this.selectedFile, this.selectedFile.name);
    }

    this.messageService.sendMessage(formData)
    .subscribe(
      response => {
        console.log(response);
        this.router.navigate(['/']);
      },
      error => {
        console.error('Error response:', error);
      }
    );
 }
}
