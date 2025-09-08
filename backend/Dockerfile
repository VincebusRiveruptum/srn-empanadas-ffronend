FROM node:18

WORKDIR /usr/src/app
COPY packag*.json ./

RUN corepack prepare pnpm@latest --activate
RUN corepack enable pnpm

COPY package.json pnpm-lock.yaml ./
RUN pnpm install

COPY . .
EXPOSE 3000
CMD pnpm start