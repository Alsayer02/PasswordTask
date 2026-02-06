This document explains the logic and implementation of the password verification system found in index.php.
1. The Logical Concept (How it Works)
 The password in this script is not static; it is Time-Based. It relies on the server's internal clock at the exact moment the page is processed.
 Technical Workflow:
  1. Timestamp Extraction: The code generates a Unix Timestamp (the total number of seconds elapsed since January 1, 1970).
  2. Type Casting: This timestamp is converted into an integer
  3. Modulo Operation: The code applies the modulo operator (%) with a value of 100,000.
  4. Final Result: This creates a rolling password that is always between 0 and 99,999, changing every single second.
2. Rationale (Why this approach?)
  This method was chosen for several specific reasons:
   Zero-Storage Requirement: Since the password is calculated mathematically on the fly, there is no need for a database or an external configuration file to store credentials.
   Dynamic Security: Even if an unauthorized person sees the password once, it will be invalid a few moments later, mimicking a basic One-Time Password (OTP) behavior.
   Efficiency: The calculation is computationally "cheap" and fast, requiring minimal server resources.
3. Ensuring Non-Randomness (Determinism)
   It is important to clarify that this password is Deterministic, not random. Here is how we ensure it follows a predictable logic:
    Mathematical Consistency: The formula $Password = Timestamp \pmod{100,000}$ will always yield the same result for the same input (time).
    Predictable Sequence: Because the timestamp increases by exactly 1 every second, the password also follows a linear sequence (e.g., if the password is 54321 now, it will be 54322 in the next second).
    Auditability: A developer can verify exactly what the password was at any specific point in history simply by knowing the time, which makes debugging easier than with a truly random generator.
