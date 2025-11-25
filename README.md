## 1. Short URL Generation
### a. Correct short URL generation
**Description:** Check that a long URL is converted to a short URL.  
**Input:** Valid long URL (e.g. http://example.com/very-long-url).  
**Expected result:** A valid short URL (e.g. http://short.ly/abc123).

### b. Unique short URL generation
**Description:** Make sure different long URLs create different short URLs.  
**Input:** Several long URLs.  
**Expected result:** Each long URL has a unique short URL.

### c. Handling repeated URLs
**Description:** Make sure the same long URL returns the same short URL.  
**Input:** Same long URL many times.  
**Expected result:** Same short URL every time.

## 2. URL Expansion
### a. Correct URL expansion
**Description:** Check that a short URL expands to the long URL.  
**Input:** Valid short URL.  
**Expected result:** Correct long URL.

### b. Handling non-existing URLs
**Description:** Check when the short URL does not exist.  
**Input:** Invalid short URL.  
**Expected result:** Error message (e.g. “URL not found”).

## 3. URL Validation
### a. Invalid long URL
**Description:** Check invalid long URLs.  
**Input:** Bad long URL (e.g. htp://invalid-url).  
**Expected result:** Error message.

## 4. Edge Cases
### a. Very long URL
**Description:** Test a very long URL.  
**Input:** More than 2000 characters.  
**Expected result:** System handles it or returns error.

### b. Empty URL
**Description:** Test an empty URL.  
**Input:** “”.  
**Expected result:** Error saying URL cannot be empty.

## 5. Redirection
### a. Correct redirection
**Description:** Check that short URL redirects to long URL.  
**Input:** Valid short URL.  
**Expected result:** User goes to correct long URL.
