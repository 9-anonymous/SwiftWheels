import { Component, OnInit } from '@angular/core';
import { SearchService } from 'src/search.service';
import { Router } from '@angular/router';
import { ChangeDetectorRef } from '@angular/core';

@Component({
  selector: 'app-main-search',
  templateUrl: './main-search.component.html',
  styleUrls: ['./main-search.component.css']
})
export class MainSearchComponent implements OnInit {

  constructor(private cdr: ChangeDetectorRef,private searchService: SearchService, private router: Router) {}
  
  selectedMark: string = '';
  selectedModel: string = '';
  marks: string[] = [];
  models: string[] = [];
  searchResults: any[] = []; // Array to store search results
  selectedCarOwnerUsername: string | null = null;

  selectedCar: any; // Define a property to hold the selected car

  selectCar(car: any): void {
    this.selectedCar = car;
    // Assuming the car object has a property for the car's ID
    this.searchService.getCarOwner(car.id).subscribe(
       (response: any) => {
         if (response.username) {
           // Store the car owner's username for use in the modal
           this.selectedCarOwnerUsername = response.username;
         } else {
           console.error('Car owner not found');
         }
       },
       (error: any) => {
         console.error('Error fetching car owner:', error);
       }
    );
   }
   
   contactCarOwnerFromModal(): void {
    if (this.selectedCarOwnerUsername) {
       this.router.navigate(['/contactinput'], { queryParams: { receiver: this.selectedCarOwnerUsername } });
    } else {
       console.error('Car owner username not found');
    }
   }
     ngOnInit(): void {
    this.fetchMarks();
    this.fetchAllCars(); // Fetch all cars on component initialization
 }
 contactCarOwner(carId: number): void {
  this.searchService.getCarOwner(carId).subscribe(
     (response: any) => {
       if (response.username) {
         this.router.navigate(['/contactinput'], { queryParams: { receiver: response.username } });
       } else {
         console.error('Car owner not found');
       }
     },
     (error: any) => {
       console.error('Error fetching car owner:', error);
     }
  );
 }
 contactUs(): void {
  this.router.navigate(['/contactinput'], { queryParams: { contactType: 'general' } });
 }
  fetchMarks() {
    this.searchService.getMarks().subscribe(
      (marks: string[]) => {
        console.log('Marks fetched:', marks); // Add this line to log the fetched marks
        this.marks = marks;
      },
      (error: any) => {
        console.error('Error fetching car brands:', error);
      }
    );
  }
  fetchAllCars() {
    this.searchService.getAllCars().subscribe(
      (cars: any[]) => {
        this.searchResults = cars;
      },
      (error: any) => {
        console.error('Error fetching all cars:', error);
      }
    );
 }
 getFirstPicture(pictures: string): string {
  if (pictures) {
     const pictureArray = pictures.split(',');
     const firstPicture = pictureArray[0];
     return `http://localhost:8000/uploads/${firstPicture}`;
  } else {
     return ''; // Return a default or empty string if pictures is null
  }
 }
 
 


  onMarkChange() {
    console.log('Selected Mark:', this.selectedMark);
    if (this.selectedMark) {
      this.searchService.getModelsForMark(this.selectedMark).subscribe(
        (models: string[]) => {
          this.models = models;
          console.log('Models for Mark:', this.models);
        },
        (error: any) => {
          this.models = [];
          console.error('Error fetching models for mark:', error);
        }
      );
    } else {
      this.models = [];
    }
  }

  onSearch() {
    if (!this.selectedMark || !this.selectedModel) {
      console.error('Mark and model must be selected for search.');
      return;
    }
  
    // Prepare search criteria
    const searchCriteria = {
      selectedMark: this.selectedMark,
      selectedModel: this.selectedModel,
      priceRangeMin: this.priceRangeValue2, // Ensure this is the correct value
      priceRangeMax: this.priceRangeValue
     };
  
    // Call service to perform search
    this.searchService.searchCars(searchCriteria).subscribe(
      (results: any[]) => {
         this.searchResults = results;
         console.log('Search Results:', this.searchResults);
      },
      (error: any) => {
         console.error('Error performing search:', error);
      }
     );
     
  }
  
  

  ///////////////////////////////////price
  priceRangeValue: number = 3000;

  updatePriceRange(event: Event) {
    const target = event.target as HTMLInputElement;
    this.priceRangeValue = parseInt(target.value);
  }

  priceRangeValue2: number = 3000;

  updatePriceRange2(event: Event) {
    const target = event.target as HTMLInputElement;
    this.priceRangeValue2 = parseInt(target.value);
  }
}
