import { Component } from '@angular/core';
import { AuthService } from '../../auth.service';
import { SharedService } from '../../shared.service';

@Component({
  selector: 'app-nav-bar',
  templateUrl: './nav-bar.component.html',
  styleUrls: ['./nav-bar.component.css']
})
export class NavBarComponent {
  userType: string = ''; // Add a property to store the user type
  receiverRole: string = '';

  constructor(public authService: AuthService, private sharedService: SharedService) {}

  setReceiverRole(role: string): void {
    this.receiverRole = role;
    this.sharedService.changeUserType(role); // Notify the shared service of the role change
  }

  isLoggedIn() {
    return this.authService.isAuthenticated();
  }

  getUsername(): string {
    return this.authService.getUsername();
  }

  logout(): void {
    this.authService.logout();
  }

  setUserType(type: string): void {
    this.sharedService.changeUserType(type);
  }

  isUserSubscribed(): boolean {
    return this.authService.isUserSubscribed();
  }
}
