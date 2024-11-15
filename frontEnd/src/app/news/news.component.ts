// news.component.ts

import { Component, OnInit } from '@angular/core';
import { NewsService } from '../news.service';
import { ActivatedRoute } from '@angular/router'; // Import ActivatedRoute

type CompanyData = {
  [key: string]: any[];
};

@Component({
  selector: 'app-news',
  templateUrl: './news.component.html',
  styleUrls: ['./news.component.css'],
})
export class NewsComponent implements OnInit {
  companies: CompanyData = {
    tesla: [],
    volkswagen: [],
    bmw: [],
  };
  totalNewsLimit = 6; // Set the total number of news items you want to display
  totalDisplayedNews: any[] = [];

  constructor(private newsService: NewsService,private route: ActivatedRoute) {}

  ngOnInit(): void {
    this.route.params.subscribe(params => {
      const mark = params['mark']; // Get the mark parameter from the route
      if (mark) {
        // If a mark parameter is provided, fetch news for that specific mark
        this.fetchCompanyNews(mark);
      } else {
    this.fetchCompanyNews('tesla');
    this.fetchCompanyNews('volkswagen');
    this.fetchCompanyNews('bmw');
    this.fetchCompanyNews('ford');
    this.fetchCompanyNews('Toyota');
    this.fetchCompanyNews('Hyundai');
    this.fetchCompanyNews('Toyota');
    this.fetchCompanyNews('Audi');
    this.fetchCompanyNews('Chevrolet');
    this.fetchCompanyNews('Nissan');

  }
});
}

  fetchCompanyNews(companyName: string): void {
    // Define the keywords that indicate the article is about a product or model
    const productKeywords = ['model', 'demand', 'launch', 'product', 'release', 'announcement', 'unveil', 'preview', 'test drive', 'review', 'specifications', 'features', 'updates', 'sales', 'promotion', 'discount', 'special edition', 'limited edition', 'new features', 'upgrade', 'performance', 'safety', 'technology', 'innovation', 'design', 'award', 'awards', 'win', 'wins', 'competition', 'competitor', 'rival', 'comparison', 'comparisons', 'comparison chart', 'comparison table', 'comparison review', 'comparison test', 'comparison analysis', 'comparison study'];
  
    this.newsService.getCarCompanyNews(companyName).subscribe((data: any) => {
      // Store the original data
      this.companies[companyName] = data;
  
      // Ensure each article has a urlToImage property, providing a default if missing
      this.companies[companyName].forEach((article: any) => {
        article.urlToImage = article.urlToImage 
      });
  
      // Filter the articles to include only those with product or model-related keywords
      this.companies[companyName] = this.companies[companyName].filter((article: any) => {
        const titleMatch = productKeywords.some(keyword => article.title.toLowerCase().includes(keyword));
        const descMatch = productKeywords.some(keyword => article.description?.toLowerCase().includes(keyword));
        return titleMatch || descMatch;
      });
  
      // Concatenate all news articles from different companies
      this.totalDisplayedNews = this.totalDisplayedNews.concat(this.companies[companyName]);
  
      // Shuffle the totalDisplayedNews array randomly
      this.shuffleArray(this.totalDisplayedNews);
  
      // Limit the total displayed news if it exceeds the limit
      if (this.totalDisplayedNews.length > this.totalNewsLimit) {
        this.totalDisplayedNews = this.totalDisplayedNews.slice(0, this.totalNewsLimit);
      }
    });
  }
  

  getObjectKeys(obj: any): string[] {
    return Object.keys(obj);
  }

  // Function to shuffle an array randomly
  private shuffleArray(array: any[]): void {
    for (let i = array.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [array[i], array[j]] = [array[j], array[i]];
    }
  }
}
