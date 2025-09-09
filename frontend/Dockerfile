FROM shinsenter/codeigniter4:latest

RUN apt-get update && apt-get install -y \
    curl \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html
COPY packag*.json ./

RUN corepack prepare pnpm@latest --activate
RUN corepack enable pnpm

COPY package.json pnpm-lock.yaml ./
RUN pnpm install

COPY . .

EXPOSE 80

CMD ["pnpm", "dev"]