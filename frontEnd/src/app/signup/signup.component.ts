// src/app/signup/signup.component.ts

import { Component, OnInit } from '@angular/core';
import { SignupService } from '../signup.service';
import { Router } from '@angular/router';
import { AuthService } from '../auth.service';
import { SharedService } from '../shared.service'; // Adjust the path as necessary

interface User {
 username: string;
 email: string;
 password: string;
 bankAccount?: string;
 jobTitle?: string;
 speciality?: string;
 roles?: string[]; // Update this line to expect an array of strings
}

@Component({
 selector: 'app-signup',
 templateUrl: './signup.component.html',
 styleUrls: ['./signup.component.css']
})
export class SignupComponent implements OnInit {
 userType: string = '';

 user: User = { username: '', email: '', password: '' };
 constructor(private sharedService: SharedService,private signupService: SignupService, private router: Router, private authService: AuthService) {}

 ngOnInit(): void {
 this.sharedService.currentUserType.subscribe(userType => this.userType = userType);
}

onSubmit(): void {
 if (this.userType === 'client') {
    this.user.roles = ['ROLE_CLIENT']; // Update this line to directly assign an array
 } else if (this.userType === 'expert') {
    this.user.roles = ['ROLE_EXPERT']; // Update this line to directly assign an array
 }

 this.signupService.register(this.user).subscribe(
    res => {
      console.log('Success!', res);
      this.router.navigate(['/']);
    },
    err => console.error('Error!', err)
 );
}
}
