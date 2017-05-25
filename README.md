# Lumin Events plugin for WordPress

The Lumin Events plugin for WordPress gives you access to the Lumin events web widget to display upcoming events for your venue.

Current version: `1.0.0`

## Features

### Upcoming Events

Add a list of upcoming events to your site using the `[lumin_events]` shortcode macro.

#### Shortcode Parameters ###
| Parameter                 | Required | Default   | Description                                                                                                                  |
|---------------------------|--------- |-----------|------------------------------------------------------------------------------------------------------------------------------|
| `venue_id`                | Yes      | None      | Lumin venue ID that the shortcode will get upcoming events for                                                               |
| `elem_id`                 | No       | None      | If you are multiple instances of the shortcode on one page, you need to set a unique ID for the element                      |
| `limit`                   | No       | Unlimited | Limit the number of upcoming events shown. If not provided, all upcoming events are shown.                                   |
| `show_date_badge`         | No       | `false`   | If `true`, a `div` element that shows a date badge is included for each event                                                |
| `disable_description`     | No       | `false`   | By default, the event description is included for each event. If set to `true`, the description is not output by the widget. |
