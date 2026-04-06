## Reflection Questions

### 1. What is the difference between GET and POST?

GET is used to retrieve data and the information is visible in the URL, making it suitable for reading pages. POST is used to send data securely in the request body, making it ideal for form submissions that create or modify data like adding emails.

### 2. Why do we use `@csrf` in forms?

@csrf generates a hidden token in the form that Laravel uses to verify that the request is coming from your own application and not from a malicious external source. Without it, Laravel will reject the form submission with a 419 error to protect against Cross-Site Request Forgery attacks.

### 3. What is session used for in this activity?

Session is used to temporarily store the list of emails across multiple requests without using a database. Every time the page reloads, the emails are retrieved from the session so they remain visible to the user.

### 4. What happens if session is cleared?

All stored emails will disappear from the list because they are only saved in the session and not in a permanent database. The next time the page loads, it will show an empty email list as if no emails were ever added.