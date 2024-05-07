import { Component, OnInit } from '@angular/core';
import { RecommendationService } from '../../recommendation.service';
import { AuthService } from '../../auth.service';
import { SharedService } from 'src/app/shared.service';
import { SearchService } from 'src/search.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-recommandation',
  templateUrl: './recommandation.component.html',
  styleUrls: ['./recommandation.component.css']
})
export class RecommandationComponent implements OnInit {
  recommendedCars: any[] = [];
  selectedMark: string = '';
  selectedModel: string = '';
  marks: string[] = [];
  models: string[] = [];
  searchResults: any[] = []; // Array to store search results
  selectedCarOwnerUsername: string | null = null;
  selectedCar: any; // Define a property to hold the selected car

  constructor(
    private recommendationService: RecommendationService,
    private authService: AuthService,
    private sharedService: SharedService,
    private searchService: SearchService,
    private router: Router
  ) { }

  ngOnInit() {
    const userId = this.authService.getUserId();
    if (userId) {
      this.recommendationService.getRecommendedCars().subscribe(
        (data: any) => {
          if (data && data[userId]) {
            this.recommendedCars = data[userId];
          }
        },
        (error) => {
          console.error('Error fetching recommended cars:', error);
        }
      );
    }
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

   addedCar(car: any) {
    console.log(car); // Log the car object to the console
    this.sharedService.addToCart(car); // Use the updated method to save the car
 }


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
   
}