import { Component, OnInit } from '@angular/core';
import { SearchService } from 'src/search.service';

@Component({
  selector: 'app-main-search',
  templateUrl: './main-search.component.html',
  styleUrls: ['./main-search.component.css']
})
export class MainSearchComponent implements OnInit {

  constructor(private searchService: SearchService) {}
  
  selectedMark: string = '';
  selectedModel: string = '';
  marks: string[] = [];
  models: string[] = [];
  searchResults: any[] = []; // Array to store search results

  selectedCar: any; // Define a property to hold the selected car

  selectCar(car: any) {
   this.selectedCar = car; // Set the selected car
  }
  
  ngOnInit(): void {
    this.fetchMarks();
    this.fetchAllCars(); // Fetch all cars on component initialization
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