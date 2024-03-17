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

  ngOnInit(): void {
    this.fetchMarks();
  }

  fetchMarks() {
    this.searchService.getMarks().subscribe(
      (marks: string[]) => {
        this.marks = marks;
      },
      (error: any) => {
        console.error('Error fetching car brands:', error);
      }
    );
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
      priceRangeMin: this.priceRangeValue2, // Potential typo: should be this.priceRangeValue2?
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
