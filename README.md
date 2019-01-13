# AND Digital API v0.1.0
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![Build Status](https://travis-ci.com/andreipa/digital-api-php.svg?branch=master)](https://travis-ci.com/andreipa/digital-api-php)
## About
Example of RESTful Web Services using vanilla PHP.
## How to use
### **List all customers**
----
  Returns json data with all customers.

* **URL**

  /customers

* **Method:**

  `GET`
  
*  **URL Params**

   None
   
* **Data Params**

  None

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `
[
    {
        "id": 1,
        "token": "5c35e38fcc38022942e47a39",
        "registered": "2019-01-08 09:09:57",
        "updated": "2019-01-03 12:26:07",
        "name": "Kimberly Evans",
        "phones": [
            "+44 (895) 571-3330",
            "+44 (928) 408-2446"]
    },
    {...}
}]`
 
* **Sample Call:**

  ```http://YOURLOCALHOST/digital-api-php/api/v1/customers```
  
### **Show customer**
----
  Returns json data about a single customer.

* **URL**

  /customers/:id

* **Method:**

  `GET`
  
*  **URL Params**

   **Required:**
 
   `id=[integer]`
  
* **Data Params**

  None

* **Success Response:**

  * **Code:** 200 <br />
    **Content:** `
[
    {
        "id": 1,
        "token": "5c35e38fcc38022942e47a39",
        "registered": "2019-01-08 09:09:57",
        "updated": "2019-01-03 12:26:07",
        "name": "Kimberly Evans",
        "phones": [
            "+44 (895) 571-3330",
            "+44 (928) 408-2446"]
    }
}]`
 
* **Sample Call:**

  ```http://YOURLOCALHOST/digital-api-php/api/v1/customers/1```

### **Update an existing customer**
----
* **URL**

  /customers/:id

* **Method:**

  `PUT`
  
*  **URL Params**

    **Required:**

   `id=[integer]`

* **Data Params**

    **Required**

    `{
          "name": "Andrei Andrade",
          "phones": [
            {
              "id": 1,
              "isActive": true,
              "phone": "+55 347269477"
            }
          ]
        }`

* **Success Response:**

  * **Code:** 200 <br />
     
* **Sample Call:**

  ```http://YOURLOCALHOST/digital-api-php/api/v1/customers/1```
  
### **Add new customer**
----
* **URL**

  /customers

* **Method:**

  `POST`
  
*  **URL Params**
    
    None
  
* **Data Params**

    **Required**

    `{
          "name": "Andrei Andrade",
          "phones": [
            {
              "id": 1,
              "isActive": true,
              "phone": "+55 347269477"
            }
          ]
        }`

* **Success Response:**

  * **Code:** 201 <br />
     
* **Sample Call:**

  ```http://YOURLOCALHOST/digital-api-php/api/v1/customers/```

## TO-DO
Create and fix PHPunit tests and Travis CI.
