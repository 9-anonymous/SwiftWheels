// src/app/MainPage/nav-bar/nav-bar.component.ts
import { Component } from '@angular/core';
import { AuthService } from '../../auth.service';
import { SharedService } from '../../shared.service'; // Adjust the path as necessary

@Component({
  selector: 'app-nav-bar',
  templateUrl: './nav-bar.component.html',
  styleUrls: ['./nav-bar.component.css']
})
export class NavBarComponent {
  userType: string = ''; // Add a property to store the user type
  receiverRole: string = '';

  constructor(public authService: AuthService,private sharedService: SharedService) {}   
 
  setReceiverRole(role: string): void {
    this.receiverRole = role;
    this.sharedService.changeUserType(role); // Notify the shared service of the role change
   }
  isLoggedIn() {
    return this.authService.isAuthenticated();
  }
  getUsername(): string {
    // Retrieve username from AuthService or wherever it is stored
    return this.authService.getUsername();
  }

  logout(): void {
    // Call AuthService or a dedicated logout service method
    this.authService.logout();
  }
  setUserType(type: string): void {
    this.sharedService.changeUserType(type);
 }
}
