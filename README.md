# Atlas Content Modeler Customer Logs WordPress Plugin

[![Continuous Integration](https://github.com/rfmeier/acm-customer-logs/actions/workflows/main.yml/badge.svg)](https://github.com/rfmeier/acm-customer-logs/actions/workflows/main.yml)

Log WooCommerce customer orders using the Atlas Content Modeler php api.

**Do not use this in production! It is has not been secured.**

## Getting Started
1. Install and activate the [Atlas Content Modeler](https://wordpress.org/plugins/atlas-content-modeler/) plugin.
2. [Download](https://github.com/rfmeier/acm-customer-logs/releases) the latest release of ACM Contact Form.
3. Install and activate the ACM Contact Form plugin.
4. Create a `Customer` model with the following fields.
    - First Name (`firstName` slug) as text field.
    - Last Name (`lastName` slug) as text field.
    - E-Mail (`email` slug) as email field.
    - Address (`address`) as multiline text field.
    - Total (`total`) as decimal number field.
5. Install and activate the ACM Customer Logs plugin.
