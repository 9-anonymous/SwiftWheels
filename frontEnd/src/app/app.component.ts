import { Component } from '@angular/core';
import { Router, NavigationEnd } from '@angular/router';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  public url: any;
 
  constructor(private router: Router) {
     this.router.events.subscribe((event) => {
       if (event instanceof NavigationEnd) {
         this.url = event.url;
       }
     });
  }
 }
 