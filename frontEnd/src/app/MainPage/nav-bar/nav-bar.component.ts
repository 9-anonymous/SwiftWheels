import { Component, OnInit } from '@angular/core';
import { AuthService } from '../../auth.service';
import { SharedService } from '../../shared.service'; 

@Component({
  selector: 'app-nav-bar',
  templateUrl: './nav-bar.component.html',
  styleUrls: ['./nav-bar.component.css']
})
export class NavBarComponent implements OnInit {
  userType: string = ''; 
  receiverRole: string = '';

  constructor(public authService: AuthService, private sharedService: SharedService) {}

  ngOnInit(): void {
    if (this.authService.isAuthenticated()) {
      this.authService.checkSubscriptionStatus();
    }
  }

  setReceiverRole(role: string): void {
    this.receiverRole = role;
    this.sharedService.changeUserType(role);
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
  showSubscriptionAlert(): void {
    if (!this.authService.isUserSubscribed()) {
      alert('You must be subscribed to contact clients.');
    }
  }
}
