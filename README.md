# Member Registration and Management System

A comprehensive web application for managing member registrations with advanced validation, address lookup, and referral tracking capabilities.

## Overview

This system provides a robust platform for member registration and management, featuring real-time validation, international phone number support, and UK address verification. Built with Laravel and modern front-end technologies, it offers a seamless user experience with responsive design and interactive feedback.

## Core Features

### 1. Member Registration
- Multi-step registration process with progress tracking
- Real-time form validation
- OTP-based email verification
- Rate-limited OTP requests for security
- International phone number validation
- National Insurance number verification
- Comprehensive error messaging

### 2. Address Management
- Integration with postcodes.io for UK address lookup
- Automatic address validation and formatting
- Support for international addresses
- Real-time postcode validation
- Interactive address search functionality
- County and constituency mapping

### 3. Profile Management
- QR code generation for referral links
- Social sharing capabilities
- Referral tracking system
- Profile completion status
- Document upload functionality
- Member status tracking

### 4. Security Features
- Rate limiting on sensitive operations
- OTP-based verification
- Secure password management
- Input sanitization and validation
- CSRF protection
- Session management

### 5. User Experience
- Real-time form validation
- Loading states and progress indicators
- Interactive feedback on user actions
- Mobile-responsive design
- Consistent error messaging
- Intuitive navigation flow

### 6. Referral System
- Unique referral code generation (ONR format)
- QR code generation for referral links
- Social sharing integration
- Referral tracking and management
- Referral statistics and reporting

### 7. Data Validation
- UK postcode format validation
- International phone number validation
- Age verification (16+ years)
- Document format validation
- Address format verification
- Email format validation

### 8. UI/UX Features
- Progress bars for multi-step forms
- Loading animations and spinners
- Disabled states during processing
- Real-time validation feedback
- Consistent styling across forms
- Mobile-friendly interface

## Technology Stack

- **Backend**: Laravel PHP Framework
- **Frontend**: Blade Templates, JavaScript
- **Styling**: CSS3, Custom SCSS
- **APIs**: postcodes.io for address lookup
- **Database**: MySQL
- **Authentication**: Laravel built-in auth

## Supported Countries for Phone Validation

- United Kingdom (+44)
- United States/Canada (+1)
- India (+91)
- Australia (+61)
- Ireland (+353)
- Nigeria (+234)

## Future Enhancements

- Enhanced analytics dashboard
- Additional payment gateway integrations
- Extended international address support
- Advanced member search functionality
- Automated document verification
- Enhanced reporting capabilities

## Support

For technical support or feature requests, please create an issue in the repository.
