import { Component, OnInit } from '@angular/core';
import { AuthService } from '../auth.service'; // Adjust the path as necessary

@Component({
 selector: 'app-user-profile',
 templateUrl: './user-profile.component.html',
 styleUrls: ['./user-profile.component.css']
})
export class UserProfileComponent implements OnInit {
 username: string = '';
 pictureUrl: string | null = null;
 roles: string[] = [];

 constructor(private authService: AuthService) {}

 ngOnInit(): void {
    this.username = this.authService.getUsername();
     this.roles = this.authService.getRoles();
    }
}
