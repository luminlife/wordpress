# Stagehand Events plugin for WordPress

The Stagehand Events plugin for WordPress gives you access to the Stagehand events web widget to display upcoming events for your venue.

Current version: `1.0.9`

## Features

### Upcoming Events

Add a list of upcoming events to your site using the `[lumin_events]` shortcode macro.

#### Shortcode Parameters ###
| Parameter                 | Required | Default   | Description                                                                                                                  |
|---------------------------|--------- |-----------|------------------------------------------------------------------------------------------------------------------------------|
| `venue_id`                | Yes      | None      | Lumin venue ID that the shortcode will get upcoming events for                                                               |
| `elem_id`                 | No       | None      | If you are multiple instances of the shortcode on one page, you need to set a unique ID for the element                      |
| `limit`                   | No       | Unlimited | Limit the number of upcoming events shown. If not provided, all upcoming events are shown.                                   |
| `target`                  | No       | Default anchor behaviour | Where event link is targeted. Mostly useful for when running in ifrane. `blank` opens in new tab, `parent` opens in originating page of the iframe. If nothing is specified, opens within the iframe |
| `show_photo`              | No       | `false`   | If true, will show the artist cover photo if available on the event listing; otherwise, it will show venue banner photo or if no photo, show Stagehand placeholder. Takes precendence over the `show_date_badge` option |
| `show_date_badge`         | No       | `false`   | If `show_photo` is not set or `false` and if `true`, a `div` element that shows a date badge is included for each event |
| `disable_description`     | No       | `false`   | By default, the event description is included for each event. If set to `true`, the description is not output by the widget. |
| `link_to`                 | No       | event page | When clicking / selecting the event, we normally redirect to the relevant event page, but if we set `linkTo` to value `artist`, then we will instead redirect to the events artist profile page |

### Upcoming Event Calendar

Add a calendar of upcoming events to your site using the `[stagehand_event_calendar]` shortcode macro.

#### Shortcode Parameters ###
| Parameter                 | Required | Default   | Description                                                                                                                  |
|---------------------------|--------- |-----------|------------------------------------------------------------------------------------------------------------------------------|
| `venue_id`                | Yes      | None      | Lumin venue ID that the shortcode will get upcoming events for                                                               |
| `elem_id`                 | No       | None      | If you are multiple instances of the shortcode on one page, you need to set a unique ID for the element                      |
| `limit`                   | No       | Unlimited | Limit the number of upcoming events shown. If not provided, all upcoming events are shown.                                   |
| `target`                  | No       | Default anchor behaviour | Where event link is targeted. Mostly useful for when running in iframe. `blank` opens in new tab, `parent` opens in originating page of the iframe. If nothing is specified, opens within the iframe |
| `background_color`         | No       | None      | Add a hex color value to display as background for days that have events. Prepend with a '#' |
| `show_photo`              | No       | `false`   | If true, will show the artist cover photo if available on the calendar day; otherwise, it will show venue banner photo or if no photo, show Stagehand placeholder. It will show the photo for the last event of the day. |
