# 📅 Módulo de Eventos - NerdHub

## Visão Geral
O módulo de eventos tem como objetivo transformar o NerdHub em um ponto de encontro para a comunidade tech, permitindo a divulgação e organização de:
- **Hackathons**: Competições de programação.
- **Workshops**: Oficinas práticas.
- **Palestras**: Apresentações técnicas.
- **Meetups**: Encontros informais.

## Funcionalidades Planejadas

### 1. Painel Administrativo (Filament)
Os administradores poderão criar e gerenciar eventos com os seguintes dados:
- Título do Evento
- Slug (URL amigável)
- Descrição Completa (Markdown/Rich Text)
- Data e Hora de Início/Fim
- Local (Presencial ou Link Online)
- Imagem de Capa (Banner)
- Link Externo para Inscrição (Sympla, Eventbrite, etc)

### 2. Frontend (Vision)
- **Listagem de Eventos (`/events`)**:
    - Cards visuais com data em destaque.
    - Filtro por "Próximos Eventos" e "Passados".
    - Busca por título.
- **Detalhes do Evento (`/events/{slug}`)**:
    - Página imersiva com banner grande.
    - Contagem regressiva para o início.
    - Botão de "Inscrever-se" ou "Ver Mais".

### 3. Integração Futura (Ideias)
- Geração de certificados automáticos.
- Check-in via QR Code no dia do evento.
- Votação de melhores projetos (para Hackathons).
