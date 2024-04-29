import { Component, OnInit } from '@angular/core';
import { AuthService } from '../auth.service'; // Adjust the path as necessary
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-user-profile',
  templateUrl: './user-profile.component.html',
  styleUrls: ['./user-profile.component.css']
})
export class UserProfileComponent implements OnInit {
    user: any = {};
  
    constructor(private authService: AuthService, private http: HttpClient) {}
  
    ngOnInit(): void {
      this.fetchUserDetails();
    }
  
    fetchUserDetails(): void {
      const userId = this.authService.getUserId();
      if (userId) {
        this.http.get<any>(`http://localhost:8000/users/${userId}`).subscribe(
          (response) => {
            this.user = response;
          },
          (error) => {
            console.error('Error fetching user details:', error);
          }
        );
      }
    }
  }