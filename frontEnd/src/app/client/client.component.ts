import { Component, OnInit } from '@angular/core';
import { ClientService } from '../services/client.service';

@Component({
  selector: 'app-client',
  templateUrl: './client.component.html',
  styleUrls: ['./client.component.css']
})
export class ClientComponent implements OnInit {
  clients: any[] = [];
  searchTerm: string = '';
  filteredUsers: any[] = [];

  constructor(private clientService: ClientService) {}

  ngOnInit(): void {
    this.getClients();
  }

  getClients(): void {
    this.clientService.getClients().subscribe(
      response => {
        this.clients = response;
        this.filteredUsers = response; 
      },
      error => {
        console.log('Error:', error);
      }
    );
  }

  deleteClient(id: number): void {
    this.clientService.deleteClient(id).subscribe(
      () => {
        console.log('Client deleted successfully.');
        this.getClients(); 
      },
      error => {
        console.log('Error:', error);
      }
    );
  }

  search(): void {
    if (!this.searchTerm) {
      this.filteredUsers = [...this.clients]; // Reset the filtered list if the search term is empty
    } else {
      const lowerCaseSearchTerm = this.searchTerm.toLowerCase();
      this.filteredUsers = this.clients.filter(client => {
        const lowerCaseEmail = client.email?.toLowerCase() || '';
        const lowerCaseUsername = client.username?.toLowerCase() || '';
        return lowerCaseEmail.includes(lowerCaseSearchTerm) || lowerCaseUsername.includes(lowerCaseSearchTerm);
      });
    }
  }
  
}
