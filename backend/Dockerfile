FROM node:18

WORKDIR /usr/src/app

COPY package.json pnpm-lock.yaml ./

RUN corepack prepare pnpm@latest --activate
RUN corepack enable pnpm

RUN pnpm install

COPY . .

EXPOSE 3000

CMD pnpm dev