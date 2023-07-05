# API Cek Mutasi Bank

API Cek Mutasi Bank is a service that allows you to check bank transactions using REST API.

## Endpoint

https://api.cekmutasi.co.id/v1/bank/search


## Methods

The endpoint supports the HTTP POST method.

## Authentication

You need to include the following header in every request: Api-Key: [API_KEY]


## Request

You need to send the data in JSON format with the following structure:

```json
{
  "search": {
    "date": {
      "from": "[FROM_DATE_TIME]",
      "to": "[TO_DATE_TIME]"
    },
    "service_code": "[SERVICE_CODE]",
    "account_number": "[ACCOUNT_NUMBER]",
    "amount": "[AMOUNT]"
  }
}

Request Data
from: Start date and time for the transaction search (Format: YYYY-MM-DD HH:MM:SS).
to: End date and time for the transaction search (Format: YYYY-MM-DD HH:MM:SS).
service_code: Bank service code (e.g., "bri", "bca", "mandiri").
account_number: Bank account number.
amount: Transaction amount.
Example Request
POST /v1/bank/search

curl -X POST -H "Api-Key: [API_KEY]" -H "Content-Type: application/json" -d '{
  "search": {
    "date": {
      "from": "2023-07-01 00:00:00",
      "to": "2023-07-05 23:59:59"
    },
    "service_code": "bri",
    "account_number": "1234567890",
    "amount": "50000.00"
  }
}' https://api.cekmutasi.co.id/v1/bank/search

Response
The server will respond with JSON format containing the bank transaction information that matches the request.

Example response:


{
  "status": "success",
  "data": [
    {
      "transaction_id": "1234567890",
      "date": "2023-07-02 09:00:00",
      "description": "Incoming transfer",
      "amount": "50000.00",
      "balance": "100000.00"
    },
    {
      "transaction_id": "0987654321",
      "date": "2023-07-03 14:30:00",
      "description": "Outgoing transfer",
      "amount": "25000.00",
      "balance": "75000.00"
    }
  ]
}

Response Data
status: Response status ("success" if successful).
data: An array containing the details of the bank transactions.
transaction_id: Transaction ID.
date: Transaction date and time.
description: Transaction description.
amount: Transaction amount.
balance: Balance after the transaction.


Make sure to replace `[API_KEY]` with a valid API key signature.

And
