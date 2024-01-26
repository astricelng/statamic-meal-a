---
id: home
blueprint: page
title: Home
seo_description: 'descripcion de prueba del home'
seo_noindex: false
seo_nofollow: false
seo_canonical_type: entry
og_title: 'open graph de prueba'
og_description: 'open graph de descripcion de prueba.'
sitemap_change_frequency: weekly
sitemap_priority: 0.5
updated_by: 3397808b-ce27-4794-9fb1-1d0fe93627fc
updated_at: 1706212392
page_builder:
  -
    id: lpbnia2z
    article:
      -
        type: heading
        attrs:
          level: 1
        content:
          -
            type: text
            text: 'Start out on top'
      -
        type: paragraph
        content:
          -
            type: text
            text: 'Peak is your personal bespoke development sherpa. Start every project with this kit full of development goodies. '
      -
        type: paragraph
        content:
          -
            type: text
            text: "But beware, this kit ain't here to be pretty. There are some examples of what Peak can do, but the rest is up to you. "
      -
        type: paragraph
        content:
          -
            type: text
            text: 'Get climbing!'
      -
        type: set
        attrs:
          id: lrhzyi8p
          values:
            type: table
            size: md
            first_row_headers: true
            first_column_headers: true
            table:
              -
                cells:
                  - uno
                  - uno.dos
                  - uno.tres
              -
                cells:
                  - dos
                  - dos.dos
                  - dos.tres
              -
                cells:
                  - tres
                  - tres.dos
                  - tres.tres
            caption: 'el caption'
      -
        type: set
        attrs:
          id: lri9aod5
          values:
            type: buttons
            buttons:
              -
                id: lrth2i4i
                label: 'contacto form'
                link_type: entry
                target_blank: true
                entry: 0bc31ebb-ada2-4470-a9be-d451ac8b1e03
                button_type: button
              -
                id: lrth2twv
                label: mail
                link_type: email
                target_blank: false
                email: anarvaez@gluttonomy.com
                button_type: inline
      -
        type: set
        attrs:
          id: lrp5fpi9
          values:
            type: image
            image: arturoform.jpg
            size: lg
            caption: 'la imagen'
      -
        type: set
        attrs:
          id: lrs1g93l
          values:
            type: video
            size: xl
            video_url: 'https://www.youtube.com/watch?v=_GTqWBq01qI'
            caption: 'capt video'
      -
        type: paragraph
        content:
          -
            type: text
            marks:
              -
                type: bold
              -
                type: italic
            text: 'Texto normal, comun y silvestre'
      -
        type: paragraph
        content:
          -
            type: text
            marks:
              -
                type: link
                attrs:
                  href: 'http://www.google.com'
                  rel: null
                  target: _blank
                  title: 'el label '
              -
                type: bold
              -
                type: italic
            text: 'a google'
    type: article
    enabled: true
  -
    id: lrhz8lrn
    title: Features
    type: cards
    enabled: true
    cards:
      -
        id: lrhzg428
        title: 'Check out a form'
        text: 'Peak renders forms and mail templates dynamically so you can add as many forms as you-d like, just by creating them in the CP. Peak ships with a default basic contact form you can edit'
        button:
          -
            id: lrhzhcq8
            label: 'Send a form'
            link_type: entry
            target_blank: false
            entry: 0bc31ebb-ada2-4470-a9be-d451ac8b1e03
            button_type: inline
        type: card
        enabled: true
      -
        id: lrthxr8d
        title: 'Way more features'
        text: 'Professional SEO, social image generation, responsive assets, appearance globals, favicons generation, search templates, dark mode support with toggle, pagination template, search and additional bottles of oxygen.'
        type: card
        enabled: true
      -
        id: lrsb35sv
        title: 'Long form content'
        text: 'For long form content you can use the Article content block. This is a Bard fieldtypeopen in new window with multiple sets of fields that are regularly used in longer articles.'
        type: card
        enabled: false
        button:
          -
            id: lrthxcdv
            label: test
            link_type: email
            target_blank: true
            email: anarvaez@gluttonomy.com
            button_type: inline
  -
    id: lrtlpb6q
    title: 'Another Feature Section'
    cards:
      -
        id: lrtlpf0j
        title: 'Otro Card'
        button:
          -
            id: lrtlpq18
            label: 'Ver mas'
            link_type: entry
            target_blank: true
            entry: 0bc31ebb-ada2-4470-a9be-d451ac8b1e03
            button_type: button
            attr_title: 'ver mas title'
            attr_aria: 'ver mas aria'
        type: card
        enabled: true
      -
        id: lrtlqahg
        title: 'Segundo card'
        type: card
        enabled: true
    type: cards
    enabled: true
  -
    id: lrtlxpse
    title: 'el formulario'
    text: 'poniendo un formulario a ver q tal'
    form: contact
    type: form
    enabled: true
seo_title: 'Prueba titulo'
---
