// shared.service.ts

import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { SearchService } from 'src/search.service';
@Injectable({
 providedIn: 'root',
})
export class SharedService {

 private userTypeSource = new BehaviorSubject<string>('');
 currentUserType = this.userTypeSource.asObservable();

 constructor(private http: HttpClient, private SearchService : SearchService) { }

 addToCart(car: any) {
   // Assuming you have a method in your DatabaseService to save the car
   this.SearchService.saveCar(car).subscribe(response => {
     console.log('Car saved successfully', response);
   }, error => {
     console.error('Error saving car', error);
   });
}

 changeUserType(userType: string) {
    this.userTypeSource.next(userType);
 }
}
