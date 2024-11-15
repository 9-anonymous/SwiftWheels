import { Component, OnInit } from '@angular/core';
import { SignupService } from '../signup.service';
import { Router } from '@angular/router';
import { AuthService } from '../auth.service';
import { SharedService } from '../shared.service';

interface User {
  username: string;
  email: string;
  password: string;
  bankAccount?: string;
  jobTitle?: string;
  speciality?: string;
  roles?: string[]; 
}

@Component({
  selector: 'app-signup',
  templateUrl: './signup.component.html',
  styleUrls: ['./signup.component.css']
})
export class SignupComponent implements OnInit {
  userType: string = '';

  user: User = { username: '', email: '', password: '' };
  selectedFile: File | null = null;
  jobDescriptionFile: File | null = null; // Add this line

  constructor(private sharedService: SharedService, private signupService: SignupService, private router: Router, private authService: AuthService) {}

  ngOnInit(): void {
    this.sharedService.currentUserType.subscribe(userType => this.userType = userType);
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
  onJobDescriptionFileChange(event: Event): void {
    const inputElement = event.target as HTMLInputElement;
    if (inputElement && inputElement.files) {
      const file = inputElement.files[0];
      if (file) {
        this.jobDescriptionFile = file;
      }
    }
  }

  onSubmit(): void {
    const formData = new FormData();
    formData.append('username', this.user.username);
    formData.append('email', this.user.email);
    formData.append('password', this.user.password);

    if (this.selectedFile) {
      formData.append('picture', this.selectedFile, this.selectedFile.name);
      console.log(formData)

    }
    if (this.userType === 'client') {
      formData.append('roles', 'ROLE_CLIENT');
      formData.append('bankAccount', this.user.bankAccount || '');
      console.log(formData)

    } else if (this.userType === 'expert') {
      formData.append('roles', 'ROLE_EXPERT');
      formData.append('jobTitle', this.user.jobTitle || '');
      formData.append('speciality', this.user.speciality || '');
      formData.append('bankAccount', this.user.bankAccount || '');

      console.log(formData)

      if (this.jobDescriptionFile) {
        formData.append('jobDescription', this.jobDescriptionFile, this.jobDescriptionFile.name);
        console.log(formData)}

    } else {
      formData.append('roles', 'ROLE_CLIENT');
    }

    this.signupService.register(formData).subscribe(
      res => {
        console.log('Success!', res);
        this.router.navigate(['/']);
      },
      err => console.error('Error!', err)
    );
  }
}
