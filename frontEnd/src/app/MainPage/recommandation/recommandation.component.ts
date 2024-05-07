import { Component, OnInit } from '@angular/core';
import { RecommendationService } from '../../recommendation.service';
import { AuthService } from '../../auth.service';

@Component({
  selector: 'app-recommandation',
  templateUrl: './recommandation.component.html',
  styleUrls: ['./recommandation.component.css']
})
export class RecommandationComponent implements OnInit {
  recommendedCars: any[] = [];

  constructor(
    private recommendationService: RecommendationService,
    private authService: AuthService
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
}